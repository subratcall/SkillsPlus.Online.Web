<template>
  <div @click="onClick">
    <div class="inline field">
      <label>Name: </label>
      <span>{{rowData.title}}</span>
    </div>
    <div class="inline field">
      <label>Email: </label>
      <span>{{rowData.category}}</span>
    </div>
    <div class="inline field">
      <label>Nickname: </label>
      <span>{{rowData.date}}</span>
    </div>
    <div class="inline field">
      <label>Birthdate: </label>
      <span>{{rowData.status}}</span>
    </div>
    <!-- <div class="inline field">
      <label>Gender: </label>
      <span>{{rowData.gender}}</span>
    </div> -->
  </div>
</template>

<script>
export default {
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  methods: {
    onClick (event) {
      console.log('my-detail-row: on-click', event.target)
    }
  },
}
</script>
