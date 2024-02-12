<template>
    <AppLayout :title="CreateaPost">
        <Container>
            <h1 class="text-2xl font-bold">Create a Post</h1>


            <form @submit.prevents="createPost" class="mt-6">
                <div>
                    <InputLabel for="title" class="sr-only">Title</InputLabel>
                    <TextInput id="title" class="w-full" v-model="form.title" placeholder="Give it a great title..."></TextInput>
                    <InputError :message="form.errors.title" class="mt-1"></InputError>
                </div>

                <div>
                    <InputLabel for="body" class="sr-only">Title</InputLabel>
                    <textArea id="body" class="w-full" v-model="form.body" rows="25"></textArea>
                    <InputError :message="form.errors.title" class="mt-1"></InputError>
                </div>

                <div class="empty-3">
                    <PrimaryButton type="submit">Create Post</PrimaryButton>
                </div>
            </form>
        </Container>
    </AppLayout>
</template>

<script setup>
    import {useForm} from "@inertiajs/vue3";
    import InputLabel from "@/Components/InputLabel.vue";
    import InputError from "@/Components/InputError.vue";
    import PrimaryButton from "@/Components/PrimaryButton.vue";
    import Container from "@/Components/Container.vue";
    import AppLayout from "@/Layouts/AppLayout.vue";
    import Create from "@/Pages/Posts/Create.vue";
    import TextInput from "@/Components/TextInput.vue";

    const form = useForm({
        title: '',
        body: '',
});

    const createPost = () => form.post(route('posts.store'));



</script>
