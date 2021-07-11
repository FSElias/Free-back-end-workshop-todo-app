<template>
    <div class="addTask">
        <input
            ref="taskName"
            type="text"
            v-model="task.name"
            v-on:keydown.enter="addTask"
        />
        <font-awesome-icon
            icon="plus-square"
            @click="addTask"
            :class="[task.name?'active':'inactive', 'plus']"
        />
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            task: {
                name: ""
            }
        }
    },
    methods: {
        addTask() {
            if (this.task.name == "") {
                return;
            }

            axios
                .post('/api/tasks', {task: this.task})
                .then(response => {
                    if (response.status == 201) {
                        this.task.name = "";
                        this.$emit('reloadList');
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>
.addTask {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus {
    font-size: 20px;
}

.active {
    color: #00ce25;
    cursor: pointer;
}

.inactive {
    color: #999;
}
</style>
