<template>
	<div>
		<nav class="panel column is-offset-2 is-8">
			<p class="panel-heading">
				All Assets
				<button class="button is-link is-outlined" @click='openAddAsset()'>
					Add New Asset
				</button>
				<span class="is-pulled-right" v-if="loading">
					<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
				</span>
			</p>
			<div class="panel-block">
				<p class="control has-icons-left">
					<input class="input is-small" type="text" placeholder="search" v-model="searchQuery">
					<span class="icon is-small is-left">
						<i class="fa fa-search" aria-hidden="true"></i>
					</span>
				</p>
			</div>
			
			<div class="panel-block" v-for="Asset,key in temp">
				<div class="column is-9">
					{{ Asset.Signature }} 
					{{ Asset.BrandName }} 
				</div>

				<div class="column is-1">
					<span class="button">
						<i class="has-text-danger fa fa-trash" aria-hidden="true" @click="Del(key,Asset.id)"></i>
					</span>
				</div>
				<div class="column is-1">
					<span class="button">
						<i class="has-text-info fa fa-edit" aria-hidden="true" @click="updateDetails(key)"></i>
					</span>
				</div>
				<div class="column is-1">
					<button class="button" @click="assetDetails(key)">
						<i class="has-text-primary fa fa-eye" aria-hidden="true" ></i>
					</button>
				</div>
			</div>
		</nav>

		<Add :openAssetModel="addNewAsset" @closeAssetRequest="close"></Add>
		<Details :openDetailsModel="assetDetailsActive" @closeAssetRequest="close"></Details>
		<Update :openDetailsModel="updateDetailsActive" @closeAssetRequest="close"></Update>
	</div>

</template>
<script>
	let Add = require('./Add.vue');
	let Details = require('./Details.vue');
	let Update = require('./Update.vue');

	export default{
		components:{Add,Details,Update},
		data(){
			return {
				addNewAsset:'',
				assetDetailsActive:'',
				updateDetailsActive:'',
				Assets:{},
				errors:{},
				loading:false,
				searchQuery:'',
				temp:''
			}
		},
		watch:{
			searchQuery(){
				if (this.searchQuery.length>0) {
					this.temp = this.Assets.filter((item) => {
						return Object.keys(item).some((key)=>{
							let string = String(item[key]) 
							return string.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
						})
					})
				}else{
					this.temp=this.Assets
				}
			}
		},
		mounted(){
			axios.post('getAllAssets')
			.then((response) =>this.Assets=this.temp=response.data)
			.catch((error) =>this.errors =error.response.data.errors);
		},
		methods:{
			indexWhere(array, conditionFn) {
				const item = array.find(conditionFn)
				return array.indexOf(item)
			},
			openAddAsset(){
				this.addNewAsset = 'is-active';
			},
			assetDetails(key){
				this.$children[1].Asset=this.temp[key];

				this.assetDetailsActive = 'is-active';
			},
			updateDetails(key){
				this.$children[2].Asset=this.temp[key];

				this.updateDetailsActive = 'is-active';
			},
			Del(key,id){

				if (confirm("Are You Sure ?")) {
					this.loading = !this.loading;
					axios.delete(`/Assets/${id}`)
					.then((response) => {
						
						if (this.$data.searchQuery != '') {
							const assetindex = this.indexWhere(this.Assets, item => item.id === id);
							this.temp.splice(key,1);

							if (assetindex >-1) {
								this.Assets.splice(assetindex,1);
							}
						}else{
							this.Assets.splice(key,1)
						}
						
						this.loading = !this.loading
					})
					.catch((error)=>this.errors = error.response.data.errors);

					// to show the error temporary :)
					// .catch(error => {
					// 	this.errors = [];
    	// 				console.log(error);	// you can debug it
    	// 				});

    }
},

close(){
	this.addNewAsset = this.assetDetailsActive =this.updateDetailsActive='';
}
}
};
</script>
