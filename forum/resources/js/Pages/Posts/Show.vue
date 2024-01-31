<template>
    <AppLayout :title="post.title">
        <container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="text-sm text-gray-600">{{ formattedDate }} ago by {{ post.user.name }}</span>

            <article class="mt-6">
                <pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre>
            </article>

            <div class="mt-12">
                <h2 class="text-xl font-semibold">Comments</h2>

                <ul class="mt-4">
                    <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">

                            <span class="sm">{{ comment.body }}</span>
<!--                            <span class="block pt-1 text-sm text-gray-600"> By {{ comment.user.name }}</span>-->


                    </li>
                </ul>

<!--                <Pagination :meta="comments.meta"/>-->
            </div>
        </container>
    </AppLayout>

</template>

<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {computed} from "vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import {formatDistance, parseISO} from "date-fns";
import {Link} from "@inertiajs/vue3";
import * as comments from "autoprefixer";
import {relativeDate} from "@/Utilities/date.js";


const props = defineProps(['post', 'comments']);

// const formattedDate = (post) => {
//     return formatDistance(parseISO(post.created_at), new Date());
// }
const formattedDate = computed(() =>relativeDate(props.post.created_at));
</script>
