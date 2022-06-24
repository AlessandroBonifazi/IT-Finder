<template>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h2>Your Info</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3 d-flex flex-column">
                             <!--DESCRIPTION-->
                             <label for="description" class="form-label mt-2">Description</label>
                            <textarea v-model="description" placeholder="add description"></textarea>
                            <!--POSITION-->
                             <label for="position" class="form-label mt-2">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="name" v-model="position">
                            <!--JOB EXPERIENCE-->
                             <label for="job-experience" class="form-label mt-2">Job Experience</label>
                            <input type="text" class="form-control" id="job-experience" placeholder="Front end " v-model="job_experience">
                            <!--linkedin-->
                            <label for="linkedin" class="form-label mt-2">Linkedin</label>
                            <input type="text" class="form-control" id="linkedin" placeholder="name@example.com" v-model="linkedin">
                            <!--GITHUB-->
                             <label for="github" class="form-label mt-2">Github</label>
                            <input type="text" class="form-control" id="github" placeholder="github" v-model="github">
                            <!--SITE-->
                             <label for="site" class="form-label mt-2">Site</label>
                            <input type="text" class="form-control" id="site" placeholder="site" v-model="site">
                            <!--PHONE NUMBER-->
                             <label for="phone-number" class="form-label mt-2">Phone Number</label>
                            <input type="text" class="form-control" id="phone-number" placeholder="phone number" v-model="phone">

                            <button class="btn btn-primary justify-self-center mt-4" @click="()=>{postData()}">NEXT</button>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CompleteSignUp',
    data(){
        return {
            position: ' ', 
            job_experience: ' ',
            phone: ' ',
            linkedin: ' ',
            github: ' ',
            site: ' ',
            description: ' ',
        }
    },
    methods:{
        postData(){
            let params = {
                position: this.position, 
                job_experience: this.job_experience,
                phone: this.phone,
                linkedin: this.linkedin,
                github: this.github,
                site: this.position,
                cv: this.description,
            }
            //window.axios.post(''+ '')
            console.log(params)
        }
    }

}
</script>

<style>

</style>