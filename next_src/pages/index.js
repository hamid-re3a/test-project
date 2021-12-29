import axios from 'axios';
import React from 'react'
import { Button, Form, Grid, Header, Image, Message, Segment } from 'semantic-ui-react'
import { useState, useEffect } from 'react';

import Router from 'next/router'
const LoginForm = () => {

    const submitForm = () => {
        axios.post('api/login', {
            email,
            password
        }).then(res => {
            alert(res.data.message);
            
            Router.push('/companies')
        }).catch((res) => alert(res.response.data.message));
    }
    const handleChangeEmail = (e) => {
        setStateEmail(e.target.value)
    }

    const handleChangePassword = (e) => {
        setStatePassword(e.target.value)
    }
    const [email, setStateEmail] = useState('');
    const [password, setStatePassword] = useState('');
    return (
        <Grid textAlign='center' style={{ height: '100vh' }} verticalAlign='middle'>
            <Grid.Column style={{ maxWidth: 450 }}>
                <Form size='large' onSubmit={submitForm}>
                    <Segment stacked>
                        <Form.Input fluid icon='user' iconPosition='left' placeholder='E-mail address'
                            name="Email"
                            value={email}
                            onChange={handleChangeEmail} />
                        <Form.Input
                            fluid
                            icon='lock'
                            iconPosition='left'
                            placeholder='Password'
                            type='password'
                            name="Password"
                            value={password}
                            onChange={handleChangePassword}
                        />

                        <Button color='teal' fluid size='large'>
                            Login
                        </Button>
                    </Segment>
                </Form>
            </Grid.Column>
        </Grid>
    )
}

export default LoginForm