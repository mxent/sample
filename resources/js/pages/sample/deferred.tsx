import { PageProps } from '@/types';
import { Deferred, usePage } from '@inertiajs/react';

const DefferedPage = () => {
    const { users } = usePage<PageProps>().props;

    return (
        <>
            <div className="p-3">
                <div className="font-bold mb-3">Deferred Props</div>
                <p>A sample implementation of deferred props.</p>
                <Deferred data="users" fallback={<div>Loading...</div>}>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            {users && users.length > 0 ? (
                                users.map(user => (
                                    <tr key={user.id}>
                                        <td>{user.id}</td>
                                        <td>{user.name}</td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan={2}>No users found.</td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </Deferred>
            </div>
        </>
    );
};

export default DefferedPage;
