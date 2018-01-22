<template>
    <form action="viewtest" method="post">
        <input type="hidden" name="_token" :value="csrf_token">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Question Description
            </div>
            <div class="panel-body">
                <markdown-editor :options="options" :toolbar="toolbar" name="description" v-model="value"/>
            </div>
            <div class="panel-footer">
                <div class="panel-body" v-html="compiledMarkdown"></div>
            </div>
            <div class="panel-footer">
                <input type="checkbox" name="isMultiAnswered" id="isMultiAnswered" v-model="isMultiAnswered"/>
                <label for="isMultiAnswered">Does this question have multiple answers?</label>
            </div>
        </div>
        <answer-create-component v-for="(answerInstance, index) in answerInstances" :is-multi-answered="isMultiAnswered" :answer-data="answerInstance" :answer-number="index+1" v-bind:key="index" v-on:deleteMe="removeAnswerInstance(index)"/>
        <a href="#" class="btn btn-sm btn-info" @click="addAnswerInstance">
            <span class="glyphicon glyphicon-plus-sign"></span> 
            Add new answer
        </a>
        <hr style="color: #ccc; background-color: #ccc; border-color: #ccc;"/>
        <input type="hidden" name="answerCount" :value="answerCount" />
        <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
    </form>
</template>

<script>
    import Editor from 'v-markdown-editor'
    import marked from 'marked'
    import AnswerCreateComponent from './AnswerCreateComponent.vue'

    export default {
        name: "question-component",
        props: ['csrf_token'],
        components: {
            Editor,
            AnswerCreateComponent
        },
        data () {
            return {
                // default options, see more options at: http://codemirror.net/doc/manual.html#config
                options: {
                    lineNumbers: true,
                    styleActiveLine: true,
                    styleSelectedText: true,
                    lineWrapping: true,
                    indentWithTabs: true,
                    tabSize: 2,
                    indentUnit: 2,
                    smartIndent: true
                },
                toolbar: "bold italic heading image link numlist bullist code",
                value: "",
                answerInstances: [],
                isMultiAnswered: false
            }
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.value, {sanitize: true});
            },
            answerCount () {
                return this.answerInstances.length
            },
        },
        methods: {
            addAnswerInstance () {
                this.answerInstances.push('');
            },
            removeAnswerInstance (index) {
                this.$delete(this.answerInstances, index)
            }
        }
    }
</script>

<style>
    .v-md-toolbar {
        height: auto !important;
    }

    button.btn-outline-secondary {
        margin: .3em !important;
    }
</style>