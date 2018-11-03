<template>
<section>
    <div class="box">
        <div class="field has-addons">
            <div class="control is-expanded">
                <input type="text" v-model="query" class="input has-text-centered" placeholder="» » » » » scrivi qualcosa « « « « «">
            </div>
            <div class="control">
                <a class="button is-info" v-if="!loading">Cerca</a>
                <a class="button is-info" v-if="loading">Cercando...</a>
            </div>
        </div>
    </div>
    <div class="tile is-ancestor" v-if="bookmarks.length > 0">
        <div v-for="(bookmark, index) in bookmarks" :index="index" :key="bookmark.id" class="tile is-3 is-parent">
            <article class="tile is-child box">
                <figure class="image">
                    <img width="240" src="https://images.unsplash.com/photo-1475778057357-d35f37fa89dd?dpr=1&auto=compress,format&fit=crop&w=1920&h=&q=80&cs=tinysrgb&crop=" alt="Image">
                </figure>
                <p class="title is-4 no-padding">{{ index }}{{ bookmark.title }}</p>
                <p class="subtitle is-6">{{ bookmark.category.title }} <a :href="this.route('admin.bookmarks_goto', {id: bookmark.id})" target="_blank"><i class="mdi mdi-24px mdi-open-in-new"></i></a></p>
                <div class="field is-grouped is-grouped-multiline" v-if="bookmark.tags.length > 0">
                    <div v-for="tag in bookmark.tags" class="control">
                        <a class="tag is-link">{{ tag.title }}</a>
                    </div>
                </div>
            </article>
            </div v-if="(index%3) == 0"><div class="tile is-ancestor" v-if="(index%3) == 0">
        </div>
    </div>
</section>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            query: '',
            bookmarks: []
        };
    },
    watch: {
        query(after, before) {
            this.fetch();
        }
    },
    created: function () {
        this.loading = true;
        axios.get('/admin/bookmarks/latest', { params: { limit: 8 } })
            .then((response) => {
                this.loading = false;
                this.bookmarks = response.data
            })
            .catch(error => {});
    },
    methods: {
        fetch() {
            this.loading = true;
            axios.get('/admin/bookmarks/search', { params: { query: this.query } })
                .then((response) => {
                    this.loading = false;
                    this.bookmarks = response.data
                })
                .catch(error => {});
        }
    }
}
</script>
