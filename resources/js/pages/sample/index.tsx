import Button from '@/components/button';
import { Link } from '@inertiajs/react';

const IndexPage = () => {
    return (
        <>
            <div className="p-3">
                <div className="font-bold mb-3">Sample</div>
                <p>Just another module created using mxent/stack.</p>
                <Link href="/deferred">
                    <Button>Deferred Props</Button>
                </Link>
            </div>
        </>
    );
};

export default IndexPage;
