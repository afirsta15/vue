<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h4>halaman mahasiswa
            <RouterLink to="/mahasiswa/create" class="btn btn-primary float-end">
              Tambah Mahasiswa
            </RouterLink>
        </h4>
      </div>

      <div class="card-body">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th> ID </th>
              <th>Nama</th>
              <th>Jurusan </th>
              <th>Email </th>
              <th>Telefon </th>
              <th>Dibuat di</th>
              <th>Aksi</th>
            </tr>
          </thead>
          
          <tbody v-if="this.mahasiswa.length > 0">
            <tr v-for="(mahasiswa, index) in this.mahasiswa" :key="index">
                <td>{{ mahasiswa.id }}</td>
                <td>{{ mahasiswa.nama }}</td>
                <td>{{ mahasiswa.jurusan }}</td>
                <td>{{ mahasiswa.email }}</td>
                <td>{{ mahasiswa.telefon }}</td>
                <td>{{ mahasiswa.dibuat_di }}</td>
              
                <td>
                  <RouterLink to="/" class="btn btn-success">
                    Edit
                  </RouterLink>
                  <button type="button" class="btn btn-danger">Delete</button>
                </td>

              </tr>
          </tbody>

          <tbody v-else="this.mahasiswa.length > 0">
            <tr>
              <td colspan="7">Loading ...</td>
            </tr>
          </tbody>

        </table>
      </div>
      </div>
</div>
</template>

<script lang="ts">
import axios from 'axios'

  export default {
    name: 'mahasiswa',
    data(){
      return {
        mahasiswa: []
      }
    },

    mounted(){
      this.getMahasiswa();
      // console.log('I am here') 
    
    },

    method: {
      getMahasiswa(){
        axios.get('http://localhost:8000/api/mahasiswa').then(res => {
          console.log(res)
        });
      }
    },

  }
</script>



