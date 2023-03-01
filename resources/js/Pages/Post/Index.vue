<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <Link href="/posts/create" class="btn btn-md btn-primary">TAMBAH DATA</Link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <h4>Application Form</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City/State/Zip</th>
                            <th scope="col">Home Phone</th>
                            <th scope="col">Cell Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Applied Position</th>
                            <th scope="col">Expected Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <td>{{ post.firstname }}</td>
                            <td>{{ post.lastname }}</td>
                            <td>{{ post.address }}</td>
                            <td>{{ post.city_state_zip }}</td>
                            <td>{{ post.homephone }}</td>
                            <td>{{ post.cellphone }}</td>
                            <td>{{ post.email }}</td>
                            <td>{{ post.appliedposition }}</td>
                            <td>{{ post.expectedsalary }}</td>
                            <td class="text-center">
                                <Link :href="`/posts/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <h4>Pendidikan</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jenjang Pendidikan Terakhir</th>
                            <th scope="col">Nama Intitusi Akademik</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pendidikan in pendidikan" :key="post.id">
                            <td>{{ pendidikan.jenjangpendidikanterakhir }}</td>
                            <td>{{ pendidikan.namaintitusiakademik }}</td>
                            <td>{{ pendidikan.jurusan }}</td>
                            <td>{{ pendidikan.tahunlulus }}</td>
                            <td>{{ pendidikan.ipk }}</td>
                            <td class="text-center">
                                <Link :href="`/pendidikan/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <h4>Riwayat Pelatihan</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kursus / Seminar</th>
                            <th scope="col">Sertifikat</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="riwayat_pelatihans in riwayat_pelatihans" :key="post.id">
                            <td>{{ post.namakursusseminar }}</td>
                            <td>{{ post.sertifikat }}</td>
                            <td>{{ post.tahun }}</td>
                            <td class="text-center">
                                <Link :href="`/riwayat_pelatihans/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                                </Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <h4>Riwayat Pekerjaan</h4>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Posisi Terakhir</th>
                            <th scope="col">Pendapatan Terakhir</th>
                            <th scope="col">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in riwayat_pekerjaans" :key="post.id">
                            <td>{{ post.namaperusahaan }}</td>
                            <td>{{ post.posisiterakhir }}</td>
                            <td>{{ post.pendapatanterakhir }}</td>
                            <td>{{ post.tahun }}</td>
                            <td class="text-center">
                                <Link :href="`/riwayat_pekerjaans/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                                </Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
//import layout
import LayoutApp from '../../Layouts/App.vue'

//import Link dari inertia
import { Link } from '@inertiajs/inertia-vue3';

import { Inertia } from '@inertiajs/inertia'

export default {

    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Link
    },

    //props
    props: {
        posts: Array // <- nama props yang dibuat di controller saat parsing data
    },

    //define Composition Api
    setup() {

        //method deletePost
        function deletePost(id) {

            Inertia.delete(`/posts/${id}`)

        }

        return {
            deletePost
            //deletePost
        }

    },

}
</script>

<style></style>
