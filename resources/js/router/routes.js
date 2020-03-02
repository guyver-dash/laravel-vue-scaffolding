import Layout from "../layouts/Layout";
import Dashboard from "../layouts/Dashboard";
import UserHome from "../pages/userHome";
import Companies from "../pages/companies/index";
import CompanyCreate from "../pages/companies/create";
import CompanyEdit from "../pages/companies/edit";
import CompanyDelete from "../pages/companies/delete";


import Employees from "../pages/employees/index";
import EmployeeCreate from "../pages/employees/create";
import EmployeeEdit from "../pages/employees/edit";
import EmployeeDelete from "../pages/employees/delete";

const routes = [
    {
        path: "/",
        name: "home",
        component: Layout
    },
    {
        path: "/login/",
        component: Layout,
        children: [
            // UserHome will be rendered inside User's <router-view>
            // when /user/:id is matched
            { path: "/login/user", component: UserHome }
        ]
    },
    {
        path: "/user/:id",
        component: Dashboard,
        meta: { needAuth: true }
    },
    {
        path: "/dashboard/:id",
        component: Dashboard,
        meta: { needAuth: true },
        children: [
            { path: "/dashboard/companies", component: Companies },
            { path: "/dashboard/employees", component: Employees },
        ]
    },
    {
        path: "/companies/:id",
        component: Dashboard,
        meta: { needAuth: true },
        children: [
            { path: "/companies/create", component: CompanyCreate },
            { path: "/companies/:id/edit", component: CompanyEdit },
            { path: "/companies/:id/delete", component: CompanyDelete }
        ]
    },
    {
        path: "/employees/:id",
        component: Dashboard,
        meta: { needAuth: true },
        children: [
            { path: "/employees/create", component: EmployeeCreate },
            { path: "/employees/:id/edit", component: EmployeeEdit },
            { path: "/employees/:id/delete", component: EmployeeDelete }
        ]
    }
];

export default routes;
