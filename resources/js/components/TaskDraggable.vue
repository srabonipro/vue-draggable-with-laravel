<template>
<main>
    <div class="row w-50 mx-auto mt-5">
        <div class="col-md-6">
            <section class="list">
                <header>UPCOMING</header>
                <draggable class="drag-area" :list="tasksNotCompletedNew" :options="{animation:200, group:'status'}" :element="'article'" @add="onAdd($event, false)"  @change="update">
                    <article class="card" v-for="(task, index) in tasksNotCompletedNew" :key="task.id" :data-id="task.id">
                        <header>
                            {{ task.title }}
                        </header>
                    </article>
                </draggable>
            </section>
        </div>
        <div class="col-md-6">
            <section class="list">
                <header>COMPLETED</header>
                <draggable class="drag-area"  :list="tasksCompletedNew" :options="{animation:200, group:'status'}" :element="'article'" @add="onAdd($event, true)"  @change="update">
                    <article class="card" v-for="(task, index) in tasksCompletedNew" :key="task.id" :data-id="task.id">
                        <header>
                            {{ task.title }}
                        </header>
                    </article>
                </draggable>
            </section>
        </div>
    </div>
</main>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },
        props: ['tasksCompleted', 'tasksNotCompleted'],
        data() {
            return {
                tasksNotCompletedNew: this.tasksNotCompleted,
                tasksCompletedNew: this.tasksCompleted
            }
        },
        methods: {
            onAdd(event, status) {
                let id = event.item.getAttribute('data-id');
                axios.patch('/demos/tasks/' + id, {
                    status: status
                }).then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    console.log(error);
                })
            },
            update() {
                this.tasksNotCompletedNew.map((task, index) => {
                    task.order = index + 1;
                });

                this.tasksCompletedNew.map((task, index) => {
                    task.order = index + 1;
                });

                let tasks = this.tasksNotCompletedNew.concat(this.tasksCompletedNew);

                axios.put('/demos/tasks/updateAll', {
                    tasks: tasks
                }).then((response) => {
                    console.log(response.data);
                }).catch((error) => {
                    console.log(error);
                })
            }

        }
    }
</script>

<style>
    /* main {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        padding: 20px 0 30px 0;
        box-sizing: border-box;
    }
    main::before{
        content: '';
        float: right;
        min-width: 20px;
        width: 10px;
        height: 100%;
    }
    main::after{
        content: '';
        float: right;
        min-width: 20px;
        width: 10px;
        height: 100%;
    } */


    .list {
      background-color: #8d0505;
      border-radius: 3px;
      margin: 5px 5px;
      padding: 10px;
      width: 100%;
    }
    .list>header {
      font-weight: bold;
      color: white;
      text-align: center;
      font-size: 20px;
      line-height: 28px;
      cursor: grab;
    }
    .list article {
      border-radius: 3px;
      margin-top: 10px;
    }

    .list .card {
      background-color: #FFF;
      border-bottom: 1px solid #CCC;
      padding: 15px 10px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bolder;
    }
    .list .card:hover {
      background-color: rgb(0, 156, 135);
      cursor: grab;
    }
    .drag-area{
     min-height: 10px;
    }
</style>
