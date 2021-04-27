<template>
  <div>
  <form @submit.prevent="validateData" method="POST" :action="'/' + selected + '/' + profileid">
    <select class="form-control" v-model="selected">
      <option value="work">Working/Employed</option>
      <option value="student">Student</option>
    </select>
    
    <div v-if="selected == 'work' ">
      <slot name="work"></slot>
    </div>
    
    <div class="" v-else-if="selected == 'student'">
      <slot name="student"></slot>
    </div>
    
  <div class="row my-4">
    <div class="col-12 text-right">
      <button type="Submit" class="btn btn-dark">Submit</button>
    </div>
  </div>
  
  </form>
  </div>
</template>

<script>
  export default{
    props: ['profileid'],
    
    data(){
      return{
        selected: 'work',
        data: ''
      }
    },
    
    methods: {
      selectedFunc(){
        //alert(this.selected)
      },
      
      validateData(){
        axios.post('/student/3', {
          school: 'mnhs'
        }).then(res => this.data = res.data)
        alert(this.data)
      }
    },
    
  }
</script>