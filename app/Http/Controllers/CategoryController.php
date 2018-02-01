<?php

namespace App\Http\Controllers;

use App\Category;
use App\Group;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    public function show(Category $category)
    {
        $category->load(['groups', 'creator']);
        return view('category.show', compact('category'));
    }

    /**
     * @param Request $request
     *
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|alpha_num'
        ]);
        $category = \Auth::user()->createdCategories()->create([
            'name' => $request->input('name')
        ]);

        return redirect(route('categories.show', ['category' => $category->id]));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateNameView(Category $category)
    {
        return view('category.editName', compact('category'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateGroupsView(Category $category)
    {
        $linkedGroups = $category->groups()->with('categories')->get();
        $unlinkedGroups = Group::whereIn('id', $linkedGroups->pluck('id')->toArray(), 'and', true)->get();
        return view('category.editGroups', compact('category', 'linkedGroups', 'unlinkedGroups'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateName(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required|alpha_num'
        ]);
        if ($category->name != $request->input('name')) {
            $category->name = $request->input('name');
            $category->save();
            $request->session()->flash("success", "Category renamed to <strong>{$category->name}</strong> successfully");
        } else {
            $request->session()->flash("success", "Entered name was same as before, no modification required.");
        }

        return redirect(route('categories.show', compact('category')));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateGroups(Request $request, Category $category)
    {
        $this->validate($request, [
            'groups' => 'required|array|min:1|exists:groups,id',
        ]);
        $category->groups()->attach($request->input('groups'), ['user_id' => auth()->id(), 'relation_to_type' => Category::class, 'relation_from_type' => Group::class]);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeGroups(Request $request, Category $category)
    {
        $this->validate($request, [
            'groups' => 'required|array|min:1|exists:groups,id',
        ]);
        $category->groups()->detach($request->input('groups'));

        return redirect()->back();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleteView(Category $category)
    {
        $reliedGroups = $category->groups()->whereHas('categories', null, '=', 1)->get();

        return view('category.delete', compact('reliedGroups', 'category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Request $request, Category $category)
    {
        if (!!$category->groups()->whereHas('categories', null, '=', 1)->count()) {
            return redirect(route('categories.delete.view', ['category' => $category->id]));
        }
        $category->groups()->detach();
//        RoleAssignment::whereRelationToId($category->id)->delete();
        try {
            $category->delete();
        } catch (\Exception $e) {
            $request->session()->flash("danger", "Category <strong>{$category->name}</strong> could not be deleted!");
            return back();
        }
        $request->session()->flash("success", "Category <strong>{$category->name}</strong> deleted successfully");

        return redirect(route('categories'));
    }
}
