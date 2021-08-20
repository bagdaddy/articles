<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Articles
                    </div>
                    <div class="card-body">
                        <div
                            v-for="article in articles"
                            class="article card"
                            :key="article.id"
                        >
                            <div class="card-header">
                                <h5>{{ article.title }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div v-if="article.thumbnail" class="col-3">
                                        <img :src="article.thumbnail"/>
                                    </div>
                                    <div class="col-9">
                                        {{ article.summary }}
                                        <div class="actions">
                                            <a :href="'/articles/' + article.id" class="button">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <CPagination
                        v-if="totalPages > 1"
                        v-show="totalPages > 1"
                        :active-page.sync="page"
                        :pages="totalPages"
                        @update:activePage="setActivePage"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "ArticleList",
    data: function () {
        return {
            articles: [],
            page: 1,
            totalPages: 1
        }
    },
    mounted () {
        this.setActivePage()
    },
    methods: {
        async setActivePage() {
            await axios.get('/api/articles?page=' + this.page).then(response => {
                this.articles = response.data.data
                this.totalPages = response.data.last_page
                console.log(response.data)
            })
        },
    }
}
</script>
