<template>
    <v-app>
        <v-navigation-drawer app dark clipped ref="drawer">
            <v-list>
                <v-list-item
                    v-for="item in menuItems"
                    :key="item.title"
                    :to="item.route"
                    link
                    class="menu-item"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <!-- Logout Section -->
                <v-list-item @click="logout" class="menu-item logout-button">
                    <v-list-item-icon>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="primary" dark>
            <v-toolbar-title class="app-bar-title">Todo App</v-toolbar-title>
        </v-app-bar>

        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            menuItems: [
                {
                    title: "Create Task",
                    route: "/home/create-task",
                    icon: "mdi-plus",
                },
                {
                    title: "View Tasks",
                    route: "/home/view-tasks",
                    icon: "mdi-view-list",
                },
            ],
        };
    },
    methods: {
        toggleDrawer() {
            this.$refs.drawer.toggle();
        },
        async logout() {
            try {

                await axios.post("/logout");

                localStorage.removeItem("token");

                this.$router.push("/login");
            } catch (error) {
                console.error("Error during logout:", error);
            }
        },
    },
};
</script>

<style scoped>
.v-navigation-drawer {
    width: 240px;
    background-color: #1e1e2d;
}

.menu-item {
    margin: 8px 0;
    transition: background-color 0.3s ease;
}

.menu-item:hover {
    background-color: #2c3e50;
}

.v-list-item-icon {
    color: #ffffff; 
}

.v-list-item-title {
    color: #ffffff;
}

.v-app-bar {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #3498db;
}

.app-bar-title {
    font-size: 1.5rem;
    font-weight: 600;
}

.logout-button {
    background-color: #e74c3c; 
    color: #ffffff;
    border-radius: 4px;
    margin: 8px 0;
}

.logout-button:hover {
    background-color: #c0392b; 
}

.v-btn {
    color: #ffffff;
}
</style>
