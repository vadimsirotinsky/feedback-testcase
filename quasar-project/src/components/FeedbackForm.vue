<template>
  <div class="row full-width">
    <div class="col-12 col-gutter-sm">
      <q-form @submit="submitFeedback" v-if="!submited">
        <q-input label="Имя" v-model="feedback.name" :error="feedbackErrors?.errors.name != undefined" :error-message="feedbackErrors?.errors?.name?.toString()"/>
        <q-input label="Телефон" v-model="feedback.phone" mask="+# (###) ### ## ##" unmasked-value :error="feedbackErrors?.errors?.phone != undefined" :error-message="feedbackErrors?.errors?.phone?.toString()"/>
        <q-input type="textarea" label="Сообщение" v-model="feedback.message" :error="feedbackErrors?.errors?.message != undefined" :error-message="feedbackErrors?.errors?.message?.toString()"/>
        <q-select :options="channelsDict" map-options emit-value label="Канал" v-model="feedback.channel"/>
        <div class="row justify-center q-mt-lg">
          <q-btn label="Отправить" color="primary" outline type="submit" :loading="loading"/>
        </div>
      </q-form>
      <div class="row justify-center" v-else>
        <div class="column">
          <h6>Форма отправлена</h6>
          <q-btn size="sm" label="Отправить еще одну" @click="submited = false" outline/>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
  import {ref} from 'vue';
  import {Feedback} from 'src/ts/models/Feedback';
  import {channelsDict} from 'src/ts/dictionaries';
  import {useFeedbackStore} from 'stores/feedback-store';
  import {AxiosError} from 'axios';
  import {useQuasar} from 'quasar';
  import {ValidationError} from 'src/ts/models/ValidationError';

  const feedbackStore = useFeedbackStore();
  const $q = useQuasar();

  const feedback = ref<Feedback>({
    id: null,
    name: null,
    phone: null,
    message: null,
    channel: 'file'
  });

  const feedbackErrors = ref<ValidationError|null>(null);

  const loading = ref(false);
  const submited = ref(false);

  async function submitFeedback() {
    loading.value = true;
    feedbackErrors.value = null;

    try {
      await feedbackStore.createFeedback(feedback.value);
      $q.notify({message: 'Форма отправлена!', color: 'success'});
      submited.value = true;
    } catch (e) {
      const error = e as AxiosError;

      if (error.response?.status == 403) {
        $q.notify({message: error?.response?.data?.toString(), color:'warning'});
      } else if (error.response?.status == 400) {
        const d = error.response.data as ValidationError;
        feedbackErrors.value = d;
        $q.notify({message: 'Проверьте правильность заполнения полей и повторите попытку', color:'warning'})
      } else {
        $q.notify({message: 'Неизвестная ошибка', color:'warning'})
      }
    } finally {
      loading.value = false;
    }
  }

</script>

<style scoped>

</style>
