<template>
  <div class="document-form">
    <h1>Generate Document</h1>
    <form @submit.prevent="generateDocument">
      <div>
        <label for="title">Document Title:</label>
        <input type="text" v-model="title" required>
      </div>
      <div>
        <label for="date">Date Created:</label>
        <input type="date" v-model="date" required>
      </div>
      <button type="submit">Generate</button>
    </form>
    <div v-if="fileUrl">
      <a :href="fileUrl" download>Download Document</a>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      title: '',
      date: '',
      fileUrl: ''
    };
  },
  methods: {
    async generateDocument() {
      try {
        const response = await axios.post('/generate-document', {
          title: this.title,
          date: this.date
        });
        this.fileUrl = response.data.file;
        console.log(response);
      } catch (error) {
        console.error('Error generating document:', error);
      }
    }
  }
};
</script>

<style scoped>
.document-form {
  max-width: 600px;
  margin: auto;
  padding: 1rem;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.document-form div {
  margin-bottom: 1rem;
}
.document-form form {
  margin-bottom: 15px;
}
.document-form a {
  padding: 0.5rem 1rem;
  background-color: #ff007d;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.document-form label {
  display: block;
  margin-bottom: 0.5rem;
}
.document-form input {
  width: 100%;
  padding: 0.5rem;
  box-sizing: border-box;
}
.document-form button {
  padding: 0.5rem 1rem;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.document-form button:hover {
  background-color: #0056b3;
}
</style>