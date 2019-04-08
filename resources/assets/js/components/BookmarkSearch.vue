<template>
<section>
    <div class="box">
        <div class="field has-addons">
            <div class="control is-expanded">
                <input type="text" v-model="query" class="input has-text-centered" placeholder="scrivi cosa vuoi cercare">
            </div>
            <template v-if="templateSearch=='full'">
            <div class="control">
                <a class="button is-info" v-if="!loading">Cerca</a>
                <a class="button is-info" v-if="loading">Cercando...</a>
            </div>
            </template>
            <template v-else>
            <div class="control has-icons-right">
                <span class="icon is-right button is-info">
                    <i class="mdi mdi-magnify"></i>
                </span>
            </div>
            </template>
        </div>
    </div>
    <div class="tile is-ancestor">
        <div v-for="(bookmark, index) in bookmarks" class="tile is-3 is-parent">
            <article class="tile is-child box">
                <figure class="image">
                    <img width="240" src="https://images.unsplash.com/photo-1475778057357-d35f37fa89dd?dpr=1&auto=compress,format&fit=crop&w=1920&h=&q=80&cs=tinysrgb&crop=" alt="Image">
                </figure>
                <p class="title is-4 no-padding">{{ bookmark.title }}</p>
                <p class="subtitle is-6">{{ bookmark.category.title }} <a :href="this.route('admin.bookmarks_goto', {id: bookmark.id})" target="_blank"><i class="mdi mdi-24px mdi-open-in-new"></i></a></p>
                <div class="field is-grouped is-grouped-multiline" v-if="bookmark.tags.length > 0">
                    <div v-for="tag in bookmark.tags" class="control">
                        <a class="tag is-link">{{ tag.title }}</a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
</template>

<script>
export default {
    props: {
        limit: {
            type: Number,
            default: 10
        },
        prefill: {
            type: Boolean,
            default: true
        },
        templateSearch: {
            type: String,
            default: 'full'
        }
    },
    data() {
        return {
            isLoading: false,
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
        if (!this.prefill)
            return {};
        this.isLoading = true;
        axios.get('/admin/bookmarks/latest', { params: { limit: this.limit } })
            .then((response) => {
                this.isLoading = false;
                this.bookmarks = response.data;
            })
            .catch(error => {});
    },
    methods: {
        fetch() {
            this.isLoading = true;
            axios.get('/admin/bookmarks/search', { params: { query: this.query } })
                .then((response) => {
                    this.isLoading = false;
                    this.bookmarks = response.data
                })
                .catch(error => {});
        }
    }
}
</script>
