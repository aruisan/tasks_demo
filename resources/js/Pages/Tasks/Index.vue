<script setup>
import {useForm} from '@inertiajs/vue3';
import {Head, router} from '@inertiajs/vue3';

defineProps({
    tasks:Array
});

const form = useForm({
    title:'',
    description:'',
});

const submit = () => {
    form.post(route('tasks.store'), {
        onSucces: () => form.reset()
    })
}

const toggleCompleted = task => {
    router.put(route('tasks.update', task.id), {
        ...task,
        completed:!task.completed
    });
}

const deleteTask = task => {
    router.delete(route('tasks.destroy', task.id));
}

</script>
<template>
    <Head  title="Mis Tareas"/>
    <div class="container py-4">
        <form @submit.prevent="submit" class="mb-4">
            <div class="mb-3">
                <label class="form-label">
                    Título
                </label>
                <input type="text" class="form-control" v-model="form.title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">
                    Descripción
                </label>
                <input type="text" class="form-control" v-model="form.description" required>
            </div>
            <button class="btn btn-primary" type="submit">crear Tarea</button>
        </form>
    </div>
    <div v.if="tasks.length" class="row">
        <div class="col-md-6 mb-3" v-for="task in tasks" :key="task.id">
            <div class="card" :class="{'border-success' : task.completed}">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ task.title }}
                    </h5>
                    <p class="card-text">
                        {{ task.description }}
                    </p>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-success btn-sm" @click="toggleCompleted(task)">
                            {{ task.completed ? 'Terminado' : 'Pendiente' }}
                        </button>

                        <button class="btn btn-outline-danger btn-sm" @click="deleteTask(task)">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>