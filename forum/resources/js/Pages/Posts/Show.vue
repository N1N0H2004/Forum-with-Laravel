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
                        <Comment :comment="comment" />

                    </li>
                </ul>

                <Pagination :meta="comments.meta"/>
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
import {relativeDate} from "@/Utilities/date.js";
import Comment from "@/Components/Comment.vue";


const props = defineProps(['post', 'comments']);


const formattedDate = computed(() =>relativeDate(props.post.created_at));
</script>
