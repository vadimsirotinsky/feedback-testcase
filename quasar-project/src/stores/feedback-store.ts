import { defineStore } from 'pinia';
import {Feedback} from 'src/ts/models/Feedback';
import {api} from 'boot/axios';

export const useFeedbackStore = defineStore('feedbacks', {
  state: () => ({}),
  getters: {},
  actions: {
    async createFeedback(feedback: Feedback) {
      return api.post('/feedbacks', feedback);
    }
  },
});
