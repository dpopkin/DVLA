<template>
  <div>
    <ul id="tasks">
      <p v-if="userData.canDeleteTask">Admin user detected</p>
      <li v-for="(value, name) in taskData" :key="name">
        {{ name }}: {{ value }} <button type="button" v-if="userData.canDeleteTask" class="btn btn-primary">X</button>
      </li>
    </ul>
    <p v-if="errorMessage">{{errorMessage}}</p>
    <input type="text" v-model="newAttributes" max-length="200" placeholder="attribute (use JSON format)">
    <button type="submit" class="btn btn-primary" @click="checkData">Submit</button>
  </div>
</template>

<script>
  module.exports = {
    data: function () {
      return {
        newAttributes: '',
        currentAPIId: 1,
        errorMessage: '',
        userData: {},
        taskData: {
          Urgent: 'File expense reports',
        }
      }
    },

    methods: {
      checkData() {
        try {
          let task = JSON.parse(this.newAttributes)
          if(task && typeof task === 'object') {
            this.merge(this.taskData, task);
            this.userData = { userNumber: this.currentAPIId};
            this.currentAPIId++;
          }
          else {
            this.errorMessage = "Item is not valid JSON." 
          }
        } catch(e) {
          this.errorMessage = "An error has occurred."
        }
        this.newAttributes = ''
      },
      deleteItem() {

      },

      merge(currentData, incomingData) {
        for(var attr in incomingData) {
          if(typeof(currentData[attr]) === "object" && typeof(incomingData[attr]) === "object") {
            this.merge(currentData[attr], incomingData[attr]);
          } else {
            currentData[attr] = incomingData[attr];
          }
        }
        return currentData;
      },
    }
  }
</script>