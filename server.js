import { PrismaClient } from './generated/prisma/index.js';
import express from 'express';

const prisma = new PrismaClient();

const app = express();
app.use(express.json()); // garante que o express possa usar json


app.get('/users', async (req, res) => {

    let users = [];

    try {
        users = await prisma.user.findMany();
        res.status(200).json(users);
    } catch (error) {
        res.status(400).json(error);
    }

})

app.post('/users', async (req, res) => {

    try {
        await prisma.user.create({
            data: {
                email: req.body.email,
                name: req.body.name,
            }
        })

        res.status(201).json(req.body);
    } catch (error) {
        res.status(400).json(error);
    }

})

app.put('/users/:id', async (req, res) => {
    try {
        await prisma.user.update({
            where: {
                id: Number(req.params.id)
            },
            data: {
                email: req.body.email,
                name: req.body.name,
            }
        })

        res.status(201).json(req.body);
    } catch (error) {
        res.status(400).json(error);
    }
})

app.delete('/users/:id', async (req, res) => {
    try {
        await prisma.user.delete({
            where: {
                id: Number(req.params.id)
            }
        })

        res.status(201).json('User Deleted');
    } catch (error) {
        res.status(400).json(error);
    }
})

app.listen(3000) // porta em que irá rodar o servidor