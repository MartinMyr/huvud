<template>
    <div id="logs">
        <section>
            <b-table
                :data="logs"
                :paginated="isPaginated"
                :per-page="perPage"
                :current-page.sync="currentPage"
                :pagination-simple="isPaginationSimple"
                :pagination-position="paginationPosition"
                :default-sort-direction="defaultSortDirection"
                :pagination-rounded="isPaginationRounded"
                :sort-icon="sortIcon"
                :sort-icon-size="sortIconSize"
                default-sort="user.first_name"
                aria-next-label="Next page"
                aria-previous-label="Previous page"
                aria-page-label="Page"
                aria-current-label="Current page">

                <b-table-column field="date" label="Datum" width="20%" sortable v-slot="props">
                    <span class="tag is-success">
                        {{ props.row.date }}
                    </span>
                </b-table-column>

                <b-table-column field="pain_level" label="Smärta" width="10%" sortable v-slot="props">
                    {{ props.row.pain_level }}
                </b-table-column>

                <b-table-column field="type" label="Typ" width="20%" sortable v-slot="props">
                    {{ props.row.type }}
                </b-table-column>

                <b-table-column field="medicin.medicin"  width="20%" label="Tagen medicin" sortable v-slot="props">
                    {{ props.row.medicin ? props.row.medicin.medicin : '' }}
                </b-table-column>

                <b-table-column field="comment" label="Kommentar" width="30%" v-slot="props">
                    {{ props.row.comment }}
                </b-table-column>

            </b-table>
        </section>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                isPaginated: true,
                isPaginationSimple: false,
                isPaginationRounded: false,
                paginationPosition: 'bottom',
                defaultSortDirection: 'asc',
                sortIcon: 'arrow-up',
                sortIconSize: 'is-small',
                currentPage: 1,
                perPage: 5
            };
        },
        props: {
            logs: {
                type: Array,
			    required: true,
            }
        }
    }
</script>
