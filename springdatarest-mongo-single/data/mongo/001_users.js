db.createUser(
    {
        user: "root",
        pwd: "hellokoding",
        roles:[
            {
                role: "readWrite",
                db:   "mydatabase"
            }
        ]
    }
);
