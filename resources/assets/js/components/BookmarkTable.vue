<template>
    <section>
        <b-field grouped group-multiline>
            <b-select v-model="perPage" :disabled="!isPaginated">
                <option value="5">5 per page</option>
                <option value="10">10 per page</option>
                <option value="15">15 per page</option>
                <option value="20">20 per page</option>
            </b-select>
        </b-field>

        <b-table
            :data="data"
            :paginated="isPaginated"
            :per-page="perPage"
            :current-page.sync="currentPage"
            :pagination-simple="isPaginationSimple"
            :default-sort-direction="defaultSortDirection"
            default-sort="title">
            <template slot-scope="props">
                <b-table-column field="id" label="ID" width="40" sortable numeric>
                    {{ props.row.id }}
                </b-table-column>
                <b-table-column field="title" label="Title" sortable>
                    {{ props.row.title }}
                </b-table-column>
                <b-table-column field="category.title" label="Category" sortable>
                    {{ props.row.category.title }}
                </b-table-column>
                <b-table-column field="created_at" label="Created at" sortable centered>
                    <span class="tag is-success">
                        {{ new Date(props.row.created_at).toLocaleDateString() }}
                    </span>
                </b-table-column>
                <b-table-column field="updated_at" label="Updated at" sortable centered>
                    <span class="tag is-success">
                        {{ new Date(props.row.updated_at).toLocaleDateString() }}
                    </span>
                </b-table-column>
            </template>
        </b-table>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                data: [],
                isPaginated: true,
                isPaginationSimple: false,
                defaultSortDirection: 'asc',
                currentPage: 1,
                perPage: 10
            }
        },
        created: function () {
            axios.get('/api/v0/bookmarks')
                .then((response) => {
                    this.data = response.data;
                })
                .catch(error => {});
        },
    }
</script>
