<a @click="showModal(tag)" class="is-icon has-text-danger"><i class="mdi mdi-24px mdi-delete"></i></a>

<template id="modal">
 <div class="modal">
	<div class="modal-window">
	  <p>Êtes-vous certain de vouloir supprimer l'utilisateur <strong>{{ tag.title }}</strong> ?</p>
	  <div class="actions">
		 <button class="cancel" @click="onCancel">Annuler</button>
		 <button class="confirm" @click="onConfirm">Confirmer</button>
	  </div>
	</div>
 </div>
</template>

<script>
export default {
    props: {
        id: {
            type: Number
        }
    },
    methods: {
        delete() {
            this.loading = true;
            axios.get('/admin/tags/delete/'+this.id).then().catch();
        }
    }
}
</script>
