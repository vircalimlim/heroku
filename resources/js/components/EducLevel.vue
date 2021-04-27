<template>
  <div>
    
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Education Level</span>
    </div>
    <div class="col-12">
      <select class="form-control" v-model="selecteditem"  name="educ_level" >
        <option value="elementary">
          Elementary
        </option>
        
        <option value="highschool">
          High School
        </option>
        
        <option value="college">
          College
        </option>
      </select>

    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Year Level</span>
    </div>
    <div class="col-12">
      
      <div v-if="selecteditem == 'elementary'" >
        
      <select class="form-control" name="year_level" > 
        
        <option :value="item" v-for="item in elem">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="selecteditem == 'highschool'">
      <select class="form-control"  name="year_level" >
        
        <option :value="item" v-for="item in highschool">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="selecteditem == 'college'">
      <select class="form-control"  name="year_level" >
        
        <option :value="item" v-for="item in college">{{item}}</option>
    
      </select>
      </div>

    </div>
  </div>
  
  </div>
</template>

<script>
  export default{
    data(){
      return{
        selecteditem: 'elementary',
        elem: ['Kinder Garten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6',],
        highschool: ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'],
        college: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
      }
    },
    
    methods: {
      targetItem(e){
       alert(e.target.value)
      }
    }
  }
</script>