import Button from '@/components/button';
import { Link } from '@inertiajs/react';

export default function IndexPage() {
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
}
