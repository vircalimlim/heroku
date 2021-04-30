<template>
  <div>
  <form @submit.prevent="validateData" method="POST" :action="'/' + selected + '/' + profileid">
  <input type="hidden" name="_token" :value="csrf">

    <select class="form-control" v-model="selected">
      <option value="work">Working/Employed</option>
      <option value="student">Student</option>
    </select>
    
    <div v-if="selected == 'work' ">

    <div class="row my-4">

    <div class="col-12 my-2">
      <span>Profession/Work</span>
    </div>

    <div class="col-12">
      <input :class="{'is-invalid': data.profession}" class="form-control" type="text" v-model="profession" name="profession" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.profession">
        <small> {{data.profession[0]}}</small>
      </div>
    </div>

  </div>
  
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Workplace</span>
    </div>
    <div class="col-12">
      <input :class="{'is-invalid': data.workplace}" class="form-control " type="text" v-model="workplace" name="workplace" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.workplace">
        <small> {{data.workplace[0]}}</small>
      </div>
    </div>
  </div>

    </div>
    
    <div class="" v-else-if="selected == 'student'">
      
      <div class="row my-4">
    <div class="col-12 my-2">
      <span>Name of School</span>
    </div>
    <div class="col-12">
      <input :class="{'is-invalid': data.school}"  class="form-control" type="text" name="school" v-model="school" value="" autocomplete="off" autofocus/>
      <div class="text-danger" v-if="data.school">
        <small> {{data.school[0]}}</small>
      </div>
     
    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Education Level</span>
    </div>
    <div class="col-12">
      <select @change="year_level = ' '" class="form-control" v-model="educ_level"  name="educ_level" >
        
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
      
      <div class="text-danger" v-if="data.educ_level">
        <small> {{data.educ_level[0]}}</small>
      </div>

    </div>
  </div>
  
  <div class="row my-4">
    <div class="col-12 my-2">
      <span>Year Level</span>
    </div>
    <div class="col-12">
      
      <div v-if="educ_level == 'elementary'" >
        
      <select class="form-control" v-model="year_level" name="year_level" > 
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in elem">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="educ_level == 'highschool'">
      <select class="form-control" v-model="year_level"  name="year_level" >
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in highschool">{{item}}</option>
    
      </select>
      </div>
      
      <div v-else-if="educ_level == 'college'">
      <select class="form-control" v-model="year_level" name="year_level" >
        <option value=" " selected>Choose options</option>
        <option :value="item" v-for="item in college">{{item}}</option>
    
      </select>
      </div>
      
      <div class="text-danger" v-if="data.year_level">
        <small> {{data.year_level[0]}}</small>
      </div>
      
    </div>
  </div>
  
    </div>
    
  <div class="row my-4">
    <div class="col-12 text-right">
      <button type="Submit" class="btn btn-dark">Submit</button>
    </div>
  </div>
  <div v-if="data">
    <span class="text-danger" role="alert">
      <strong>

  </strong>
  </span>
  
  </div>
  </form>
  </div>
</template>

<script>
  export default{
    props: ['profileid'],
    
    data(){
      return{
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        profession: '',

        workplace: '',

        school: '',
        
        educ_level: 'elementary',
        
        year_level: ' ',
        
        elem: ['Kinder Garten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6',],
        
        highschool: ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'],
        
        college: ['1st Year', '2nd Year', '3rd Year', '4th Year'],
        
        selected: 'work',
        
        data: ''
      }
    },
    
    methods: {
      selectedFunc(){
        //alert(this.selected)
      },
      
      validateData(){

        if(this.selected == 'student') {

        axios.post('/student/'+ this.profileid, {
          school: this.school,
          educ_level: this.educ_level,
          year_level: this.year_level
        })
        .then(res => {
        this.data = res.data
        if(!this.data.success){
          return false
        }
        else{
          window.location.href = '/profile/' + this.profileid
        }
        
          
        })
        .catch(error => console.log(error))
        
      }
  
      else if(this.selected == 'work'){
      axios.post('/work/'+ this.profileid, {
          profession: this.profession,
          workplace: this.workplace
        })
        .then(res => {
        this.data = res.data
        if(!this.data.success){
          return false
        }
        else{
          window.location.href = '/profile/' + this.profileid
        }
        
          
        })
        .catch(error => console.log(error))
        
      }

      }
    },
    
  }
</script>