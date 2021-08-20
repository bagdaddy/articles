<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div v-if="articleData" class="card-header">
                        {{ articleData.title }}
                    </div>
                    <div v-else class="card-header">
                        Loading
                    </div>
                    <div v-if="articleData" class="card-body">
                        {{ articleData.summary }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "Article",
    props: {
        article: {
            type: Number,
            default: null
        }
    },
    data: function () {
        return {
            articleData: null
        }
    },
    mounted() {
        axios.get('/api/articles/' + this.article)
            .then((response) => {
                this.articleData = response.data
            })
    }
}
</script>

