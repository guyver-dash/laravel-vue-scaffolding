import Layout from "../layouts/Layout";

import UserHome from "../pages/userHome";
import UserProfile from "../pages/userProfile";
import UserPosts from "../pages/userPosts";

const routes = [
    {
        path: "/",
        name: "home",
        component: Layout
    },
    {
        path: "/user/:id",
        component: Layout,
        children: [
            // UserHome will be rendered inside User's <router-view>
            // when /user/:id is matched
            { path: "", component: UserHome },

            // UserProfile will be rendered inside User's <router-view>
            // when /user/:id/profile is matched
            {
                path: "profile",
                component: UserProfile,
                meta: { needAuth: true }
            },

            // UserPosts will be rendered inside User's <router-view>
            // when /user/:id/posts is matched
            { path: "posts", component: UserPosts }
        ]
    }
];

export default routes;
