import Dashboard from "../layouts/Dashboard";
import Login from "../pages/Login";


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
        component: Login
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
