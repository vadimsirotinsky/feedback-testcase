<template>
  <q-page>
    <div class="col-12">
      <div class="row full-width justify-center">
        <h5>Форма обратной связи</h5>
      </div>
      <div class="row justify-center q-pa-md">
        <div class="col-12 col-sm-10 col-md-6 col-lg-4">
          <FeedbackForm/>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script setup lang="ts">
import FeedbackForm from 'components/FeedbackForm.vue';
</script>
