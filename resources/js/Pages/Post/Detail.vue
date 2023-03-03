<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="p in pendidikann" :key="p.id">
                            <td>{{ p.jenjangpendidikanterakhir }}</td>
                            <td>{{ p.namaintitusiakademik }}</td>
                            <td>{{ p.jurusan }}</td>
                            <td>{{ p.tahunlulus }}</td>
                            <td>{{ p.ipk }}</td>
                            <td class="text-center">
                                <!-- <Link :href="`/pendidikan/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button> -->
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in pelatihann" :key="post.id">
                            <td>{{ post.namakursusseminar }}</td>
                            <td>{{ post.sertifikat }}</td>
                            <td>{{ post.tahun }}</td>
                            <td class="text-center">
                                <!-- <Link :href="`/riwayat_pelatihans/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                                </Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button> -->
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
                        <tr v-for="post in pekerjaann" :key="post.id">
                            <td>{{ post.namaperusahaan }}</td>
                            <td>{{ post.posisiterakhir }}</td>
                            <td>{{ post.pendapatanterakhir }}</td>
                            <td>{{ post.tahun }}</td>
                            <td class="text-center">
                                <!-- <Link :href="`/riwayat_pekerjaans/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                                </Link>
                                <button @click.prevent="deletePost(`${post.id}`)"
                                    class="btn btn-sm btn-danger">DELETE</button> -->
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
        pendidikann: Array, // <- nama props yang dibuat di controller saat parsing data
        pelatihann: Array,
        pekerjaann: Array,
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
