<template>
    <div :class="compClass" v-on:mouseover="mouseOver"
         v-on:mouseleave="mouseLeave"
         style="cursor: pointer;">
        <transition name="slide-left-fade">
            <div :class="buttonsClass" v-if="show" style="position: absolute; left: -2.1em;">
                <button class="btn btn-outline-danger pl-2 pr-2 pt-2 pb-2" data-toggle="modal"
                        data-target="#deleteModal" @click="deleteItem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-trash"
                         viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd"
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </div>
        </transition>
        <div class="d-flex flex-row col-12">
            <div data-label="id" class="col-3 pb-2 pt-2 mb-1">{{ this.id }}</div>
            <div data-label="name" class="col-9 pb-2 pt-2 mb-1">{{ this.name }}</div>
        </div>
        <!--        <transition name="slide-fade">-->
        <!--            <div :class="buttonsClass" v-if="show">-->
        <!--                <a :href="'/'+this.resource+'/'+id+'/edit'" class="btn btn-outline-primary pl-2 pr-2 pt-2 pb-2">-->
        <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
        <!--                         class="bi bi-pencil-square" viewBox="0 0 16 16">-->
        <!--                        <path-->
        <!--                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>-->
        <!--                        <path fill-rule="evenodd"-->
        <!--                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>-->
        <!--                    </svg>-->
        <!--                </a>-->
        <!--            </div>-->
        <!--        </transition>-->
    </div>
</template>

<script>
export default {
    name: "TableRow",
    props: {
        id: Number,
        name: String,
        resource: String,
    },
    data() {
        return {
            className: "item d-flex flex-row align-items-center col pl-0 pr-0",
            buttonsClass: "btn-group d-flex flex-row ",
            compClass: "item d-flex flex-row align-items-center col pl-0 pr-0",
            show: false,
        }
    },
    methods: {
        mouseOver(event) {
            this.compClass = this.className + " bg-accent";
            this.show = true;
        },
        mouseLeave(event) {
            this.compClass = this.className;
            this.show = false;
        },
        deleteItem(e) {
            // axios
            //     .delete(window.location.origin + '/api/'+this.resource + "/" + this.id);
            // this.$emit('reload');
            this.$emit("deleteById", {id: this.id, resource: this.resource});
        }
    }
}
</script>

<style scoped>
.bg-accent {
    transition: background-color .3s;
    background-color: rgba(187, 187, 187, 0.99);
}

.slide-fade-enter-active, .slide-left-fade-enter-active {
    transition: all .3s ease;
}

.slide-fade-leave-active, .slide-left-fade-leave-active {
    transition: all .3s ease;
}

.slide-fade-enter, .slide-fade-leave-to {
    transform: translateX(15px);
    opacity: 0;
}

.slide-left-fade-enter, .slide-left-fade-leave-to {
    transform: translateX(-15px);
    opacity: 0;
}
</style>
