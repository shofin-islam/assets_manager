<template>
	<div class="modal" :class="openDetailsModel">
		<div class="modal-background"></div>
		<div class="modal-card">
			<header class="modal-card-head">
				<p class="modal-card-title">Assets Details</p>
				<button class="delete" aria-label="close" @click='close'></button>
			</header>
			<section class="modal-card-body">
				<div class="field">
					<label class="label">Unique Code</label>
					<div class="control">
						<input class="input" type="text" v-model="Asset.Signature" placeholder="Assets Unique Code">

					</div>
				</div>

				<div class="field">
					<label class="label">Type</label>
					<div class="control">
						<div class="select">
							<select>
								<option value="0">Select Type</option>
								<option value="1">IP Phone</option>
								<option value="2">SIM Card</option>
								<option value="3">Cell Phone</option>
								<option value="4">Pendrive</option>
							</select>
						</div>
					</div>
				</div>

				<div class="field">
					<label class="label">Brand</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input is-danger" type="text" placeholder="Brand Name">
						<span class="icon is-small is-left">
							<i class="fa fa-envelope"></i>
						</span>
						<span class="icon is-small is-right">
							<i class="fa fa-exclamation-triangle"></i>
						</span>
					</div>
				</div>

				<div class="field">
					<label class="label">Purpose</label>
					<div class="control">
						<textarea class="textarea" placeholder="Purpose"></textarea>
					</div>
				</div>
				<div class="field">
					<label class="label">Carried By</label>
					<div class="control has-icons-left has-icons-right">
						<input class="input is-danger" type="email" placeholder="E-Mail">
						<span class="icon is-small is-left">
							<i class="fas fa-envelope"></i>
						</span>
						<span class="icon is-small is-right">
							<i class="fas fa-exclamation-triangle"></i>
						</span>
					</div>
				</div>

			</section>
			<footer class="modal-card-foot">
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
			Asset:''
		}
	},
	methods:{
		close(){
			this.$emit('closeAssetRequest')
		}
	}
};
</script>