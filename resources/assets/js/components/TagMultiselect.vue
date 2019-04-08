<template>
    <section>
        <b-field label="Enter some tags">
            <b-taginput
                v-model="tags"
                :data="filtered"
                autocomplete
                :allow-new="allowNew"
                field="title"
                icon="label"
                placeholder="Choose a tag or Add a new one"
                @typing="getFilteredTags">
                <template slot-scope="props">{{props.option.title}}</template>
                <template slot="empty">There are no items</template>
            </b-taginput>
        </b-field>
    </section>
</template>

<script>
    export default {
        props: {
            selected: {
                type: Array,
            },
        },
        data() {
            return {
                tags: [],
                allTags: [],
                filtered: [],
                isSelectOnly: false,
                allowNew: true,
            }
        },
        created: function () {
            this.tags = this.selected;
            axios.get('/api/v0/tags')
                .then((response) => {
                    this.allTags = response.data;
                })
                .catch(error => {});
        },
        methods: {
            getFilteredTags(text) {
                this.filtered = this.allTags.filter((option) => {
                    return option.title
                        .toString()
                        .toLowerCase()
                        .indexOf(text.toLowerCase()) >= 0
                })
            }
        }
    }
</script>
