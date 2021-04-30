<template>
    <div>

<div class="row mt-md-5 py-2 justify-content-around">
<div class="col-12 col-md-8 col-lg-7">
  
<h3>Create Profile</h3>

<form method="POST" action="/profile" @submit.prevent="submit">
  <input type="hidden" name="_token" :value="csrf">
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Household Number</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input v-model="houseNum" class="form-control" type="text" name="houseNum" autocomplete="houseNum"/>
    <div class="text-danger" v-if="status.houseNum">
        <small> {{status.houseNum[0]}}</small>
    </div>
  </div>
  
</div>
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input v-model="firstname" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
    <div class="text-danger" v-if="status.firstname">
        <small> {{status.firstname[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Middle Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input v-model="middlename" class="form-control" type="text" name="middlename" autocomplete="middlename"/>
    <div class="text-danger" v-if="status.middlename">
        <small> {{status.middlename[0]}}</small>
    </div>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Last Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input v-model="lastname" class="form-control" type="text" name="lastname" autocomplete="lastname"/>
    <div class="text-danger" v-if="status.lastname">
        <small> {{status.lastname[0]}}</small>
    </div>
  </div>
  
</div>




<div class="row">
  <div class="col text-right">
  <button type="submit" class="btn btn-dark">Submit</button>
  </div>
</div>

</form>

</div>
</div>

    </div>
</template>

<script>
export default {
    data() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        houseNum: '',
        firstname: '',
        middlename: '',
        lastname: '',
        status: ''
    }
},
    methods: {
        submit(){
            axios.post('/profile', {
                houseNum: this.houseNum,
                firstname: this.firstname,
                middlename: this.middlename,
                lastname: this.lastname,
            })
            .then(response =>  {
                console.log(this.status = response.data)
                if(!this.status.success){
                    return false
                }
                else{
                    this.houseNum = ''
                    this.firstname = ''
                    this.middlename = ''
                    this.lastname = ''
                }
            })
            .catch(error => console.log(error))
        },
    }


}
</script>
