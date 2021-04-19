<template>
  <div>
    <select class="form-control" @change="selectedFunc" v-model="selected">
      <option value="work">Working/Employed</option>
      <option value="student">Student</option>
    </select>
    
    <div v-if="selected == 'work' ">
      <slot name="work"></slot>
    </div>
    <div class="" v-else-if="selected == 'student'">
      <slot name="student"></slot>
    </div>
  </div>
</template>

<script>
  export default{
    mounted(){
      //alert('hello')
    },
    data(){
      return{
        selected: 'work'
      }
    },
    methods: {
      selectedFunc(){
        //alert(this.selected)
      }
    }
  }
</script>