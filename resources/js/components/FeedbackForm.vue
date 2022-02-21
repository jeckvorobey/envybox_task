<template>
    <div class="container">
        <div class="alert alert-success" role="alert" v-if="isSuccess">
            Ваше обращение принято!
        </div>
        <div class="alert alert-danger" role="alert" v-if="isDanger">
            Проверте правильность заполнения полей! Все поля обязательны для
            заполнения!
        </div>
        <form class="feedback__form row col-4 d-flex flex-column px-2">
            <div class="mb-3">
                <label for="uname" class="form-label">Ваше Имя</label>
                <input
                    v-model="form.uname"
                    type="text"
                    class="form-control"
                    id="uname"
                    placeholder="Ваше Имя"
                />
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Ваш номер телефона</label>
                <input
                    v-model="form.phone"
                    type="tel"
                    class="form-control"
                    id="phone"
                    placeholder="Ваш номер телефона"
                />
            </div>
            <div class="mb-3">
                <label for="msg" class="form-label">Обращение</label>
                <textarea
                    v-model="form.msg"
                    class="form-control"
                    id="msg"
                    placeholder="Текст Вашего обращения"
                />
            </div>
            <div class="d-flex justify-content-evenly">
                <button
                    type="button"
                    class="btn btn-primary col-5"
                    @click.prevent="save"
                >
                    Записать в файл
                </button>
                <button
                    type="button"
                    class="btn btn-success col-5"
                    @click.prevent="send"
                >
                    Записать в бд
                </button>
            </div>
        </form>
    </div>
</template>

<style lang="scss" scoped></style>

<script>
import axios from "axios";

export default {
    name: "FeedbackForm",
    data: () => ({
        isSuccess: false,
        isDanger: false,
        form: {
            save: "",
            uname: "",
            phone: "",
            msg: "",
        },
    }),
    methods: {
        send() {
            this.form.save = "db";
            axios
                .post("/api/feedback", this.form, {
                    headers: {
                        "content-type": "application/json",
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.isDanger = false;
                        this.isSuccess = true;
                    }
                })
                .catch((err) => {
                    if (err.response.status === 422) {
                        this.isDanger = true;
                    }
                    console.log(err);
                });
        },
        save() {
            this.form.save = "file";
            axios
                .post("/api/feedback", this.form, {
                    headers: {
                        "content-type": "application/json",
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.isDanger = false;
                        this.isSuccess = true;
                        console.log(res);
                    }
                })
                .catch((err) => {
                    if (err.response.status === 422) {
                        this.isDanger = true;
                    }
                    console.log(err);
                });
        },
        loadMsg() {
            axios
                .get("/api/feedback")
                .then((res) => console.log(res.data))
                .catch((err) => console.log(`===> ${err.response.data}`));
        },
    },
    mounted() {},
};
</script>
