<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-task-form
                v-on:reloadList="getList()"
            />
        </div>
        <list-view
            :tasks="tasks"
            v-on:reloadList="getList()"
        />
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
    },
    data: function () {
        return {
            tasks: []
        }
    },
    methods: {
        getList() {
            axios
                .get('api/tasks')
                .then(response => {
                    this.tasks = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getList();
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
