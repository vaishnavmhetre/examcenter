<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span>
                Answer #{{answerNumber}}
            </span>
            <span style="float: right;">
                <a class="btn btn-xs btn-danger" @click="sendRemoveRequest" href="#">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </span>
        </div>
        <div class="panel-body">
            <markdown-editor :options="options" :toolbar="toolbar" :name="'answer_'+answerNumber+'_description'" v-model="answerData"/>
        </div>
        <div class="panel-footer">
            <div class="panel-body" v-html="compiledMarkdown"></div>
        </div>
        <div class="panel-footer">
            <input :type="isMultiAnswered ? 'checkbox' : 'radio'" :name="isMultiAnswered ? 'answer_correct[]' : 'answer_correct'" id="answer_correct" :value="answerNumber">
            <label for="answer_correct">Is this the correct answer?</label>
        </div>

    </div>
</template>

<script>
    import Editor from 'v-markdown-editor'
    import marked from 'marked'

    export default {
        props: ['answerNumber', 'answerData', 'isMultiAnswered'],
        name: "answer-create-component",
        components: {
            Editor
        },
        created: function () {
            this.value = ''
        },
        data () {
            return {
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
            }
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.answerData, {sanitize: true});
            }
        },
        methods: {
            sendRemoveRequest () {
                this.$emit('deleteMe');
            }
        }
    }
</script>

<style scoped>

</style>