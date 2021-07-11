<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title"> Todo List</h2>
            <add-task-form/>
        </div>
        <list-view/>
    </div>
</template>
<script>
import AddTaskForm from "./AddTaskForm";
import ListView from "./ListView";

import {library} from '@fortawesome/fontawesome-svg-core'
import {faPlusSquare, faTrash} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import Vue from "vue";

library.add(faPlusSquare, faTrash)

Vue.component('font-awesome-icon', FontAwesomeIcon)

export default {
    components: {
        AddTaskForm,
        ListView
    }
}
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>
