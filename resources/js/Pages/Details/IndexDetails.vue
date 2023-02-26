<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <Link href="/details/create" class="btn btn-md btn-primary">TAMBAH DATA</Link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jenjang Pendidikan Terakhir</th>
                            <th scope="col">Nama Intitusi Terakhir</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">IPK</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in details" :key="post.id">
                            <td>{{ post.jenjangpendidikanterakhir }}</td>
                            <td>{{ post.namaintitusiterakhir }}</td>
                            <td>{{ post.jurusan }}</td>
                            <td>{{ post.tahunlulus }}</td>
                            <td>{{ post.ipk }}</td>
                            <td class="text-center">
                                <Link :href="`/details/${post.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT</Link>
                                <button @click.prevent="deleteDetails(`${details.id}`)"
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
            deleteDetails
            //deleteDetails
        }

    },

}
</script>

<style></style>
