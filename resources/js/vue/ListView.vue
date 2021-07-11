<template>
    <div>
        <div v-for="(task,index) in tasks" :key="index">
            <list-task
                :task="task"
                class="task"
                v-on:taskChanged="$emit('reloadList')"
            />
        </div>
    </div>
</template>
<script>
import ListTask from "./ListTask";

export default {
    props: ['tasks'],
    components: {ListTask}
}
</script>

<style scoped>
.task {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
