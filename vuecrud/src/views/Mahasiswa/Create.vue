<template>
    <div class="container" mt-5>
        <div class="card">
            <div class="card-header">
                <h4>Edit Mahasiswa</h4>
            </div>
            <div class="card-body">

                <ul class="alert alert-warning" v-if="object.keys(this.errorList).length> 0">
                    <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
                        {{ error[0] }}
                    </li>
                </ul>

                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" v-model="model.mahasiswa.nama" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Jurusan</label>
                    <input type="text" v-model="model.mahasiswa.jurusan" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" v-model="model.mahasiswa.email" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label for="">Telefon</label>
                    <input type="text" v-model="model.mahasiswa.telefon" class="form-control"/>
                </div>
                <div class="mb-3">
                    <button type="button" @click="saveMahasiswa" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'mahasiswaCreate',
    data(){
        return {
            errorList '',
            model:{
                mahasiswa:{
                    nama: '',
                    jurusan: '',
                    email: '',
                    telefon: ''
                }
            }

        }
    },

    methods: {
        saveMahasiswa(){
            var mythis = this;
            axios.post('http://localhost:8000/api/mahasiswa', this.model.mahasiswa)
            .then(res =>{
                console.log(res)
                alert(res.data.message);

                this.model.mahasiswa:{
                    nama: '',
                    jurusan: '',
                    email: '',
                    telefon: ''
                    }
                
                this.errorList = '';
            })

            .catch(function (error) {
            if (error.response) {

            if(error.response.status == 422){
                mythis.errorList = error.response.data.errors;
                }

                //console.log(error.response.data);
                //console.log(error.response.status);
                //console.log(error.response.headers);
                } else if (error.request) {
                console.log(error.request);
                } else {
                console.log('Error', error.message);
                    }
                });
        }
    },

}
</script>