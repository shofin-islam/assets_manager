<template>
	<div class="modal" :class="openDetailsModel">
		<div class="modal-background"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title">Update {{Asset.Signature}}'s Info</p>
				<button class="delete" aria-label="close" @click='close'></button>
			</header>
			<section class="modal-card-body">
				<div class="field">
					<label class="label">Unique Code</label>
					<div class="control">
						<input class="input" :class="{'is-danger': errors.Signature}" type="text" placeholder="Assets Unique Code" v-model="Asset.Signature" >
						<small v-if="errors.Signature" class="has-text-danger">{{ errors.Signature[0] }}</small>
					</div>
				</div>

				<div class="field">
					<label class="label">Type</label>
					<div class="control">
						<div class="select" :class="{'is-danger': errors.CategoryID}">
							<select v-model="Asset.CategoryID">
								<option value="0">Select Type</option>
								<option value="1">IP Phone</option>
								<option value="2">SIM Card</option>
								<option value="3">Cell Phone</option>
								<option value="4">Pendrive</option>
							</select>
							<small v-if="errors.CategoryID" class="has-text-danger">{{ errors.CategoryID[0] }}</small>
						</div>
					</div>
				</div>

				<div class="field">
					<label class="label">Brand</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input" :class="{'is-danger': errors.BrandName}" type="text" placeholder="Brand Name" v-model="Asset.BrandName">
						<span class="icon is-small is-left">
							<i class="fas fa-envelope"></i>
						</span>
						<span class="icon is-small is-right">
							<i class="fas fa-exclamation-triangle"></i>
						</span>
					</div>
					<small v-if="errors.BrandName" class="has-text-danger">{{ errors.BrandName[0] }}</small>
				</div>

				<div class="field">
					<label class="label">Purpose</label>
					<div class="control">
						<textarea class="textarea" :class="{'is-danger': errors.Purpose}" placeholder="Purpose" v-model="Asset.Purpose"></textarea>
					</div>
					<small v-if="errors.Purpose" class="has-text-danger">{{ errors.Purpose }}</small>
				</div>
				<div class="field">
					<label class="label">Carried By</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input" :class="{'is-danger': errors.CarriedBy}" type="email" placeholder="E-Mail" v-model="Asset.CarriedBy">
						<span class="icon is-small is-left">
							<i class="fas fa-envelope"></i>
						</span>
						<span class="icon is-small is-right">
							<i class="fas fa-exclamation-triangle"></i>
						</span>
					</div>
					<small v-if="errors.CarriedBy" class="has-text-danger">{{ errors.CarriedBy[0] }}  </small>
				</div>

			</section>
			<footer class="modal-card-foot">
				<button class="button is-success" @click='updateAsset'>Save Changes</button>
				<button class="button" @click='close'>Cancel</button>
			</footer>
		</div>
	</div>
</template>
<script>
export default{
	props:['openDetailsModel'],
	data(){
		return {
			Asset:{},
			errors:{}
		}
	},
	methods:{
		close(){
			this.$emit('closeAssetRequest')
		},
		updateAsset(){
			axios.patch(`/Assets/${this.Asset.id}`,this.$data.Asset).then((response) =>this.close()).catch((error) =>this.errors =error.response.data.errors);
		}

	}
};
</script>