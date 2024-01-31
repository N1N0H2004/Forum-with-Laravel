<template>
    <AppLayout :title="post.title">
        <container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="text-sm text-gray-600">{{ formattedDate }} ago by {{ post.user.name }}</span>

            <article class="mt-6">
                <pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre>
            </article>
        </container>
    </AppLayout>

</template>

<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {computed} from "vue";
import Container from "@/Components/Container.vue";


const props = defineProps(['post']);

// Werkt niet \/
// const formattedDate = computed(() => formatDistance(parseISO(props.post.created_at), new Date()));
</script>
