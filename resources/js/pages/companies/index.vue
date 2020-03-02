<template>
    <div style="padding-left: 20px;">
        <b-form-input v-model="filter" placeholder="Search company name... " style="margin-bottom: 5px;" debounce="500"></b-form-input>
        <b-button variant="primary" style="margin-bottom: 5px;" to="/companies/create">Add Company</b-button>
        <b-table striped hover :items="companies" small :fields="fields">
            <template v-slot:cell(action)="data">
                 <b-button variant="info" style="margin-bottom: 5px;" :to="`/companies/${data.item.id}/edit`"> Edit</b-button>
                 <b-button variant="danger" style="margin-bottom: 5px;" :to="`/companies/${data.item.id}/delete`">Delete</b-button>
            </template>
        </b-table>
        
        <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            aria-controls="my-table"
    ></b-pagination>
    </div>
</template>

<script>
export default {
    data(){
        return {
            filter: '',
            fields: [
          { key: 'name', label: 'Name' },
          { key: 'address', label: 'Address' },
           { key: 'website', label: 'Website' },
           { key: 'action', label: 'Actions'}
        ],
        page: 1,
        perPage: 10,
        currentPage: 1,
        rows: 0,
            companies: []
        }
    },
    methods: {
        functionName(){

        },
        getCompanies(){
            axios.get(`companies?page=${this.currentPage}&perPage=${this.perPage}&filter=${this.filter}`).then(res => {
                this.companies = _.values(res.data.companies.data)
                this.rows = res.data.companies.total
            })
        }
    },
    mounted(){
        this.getCompanies()
    },
    watch: {
        currentPage(){
            this.getCompanies()
        },
        filter(){
            this.getCompanies()
        }
    }
};
</script>
