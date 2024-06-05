import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import { Image } from 'lucide-react';
import { PropsWithChildren } from 'react';

export default function Guest({ children }: PropsWithChildren) {
    return (
        <div className="w-full lg:grid lg:min-h-[600px] lg:grid-cols-2 xl:min-h-[595px]">
            <div className="flex items-center justify-center py-10">
                <div className="mx-auto grid w-[450px] gap-2">
                    {/* <div className="grid gap-2 text-center">
                        <h1 className="text-2xl font-bold">Bengkel Ongel</h1>
                        <p className="text-balance text-muted-foreground">
                            Selamat Datang di Website Bengkel Ongel
                        </p>
                    </div> */}

                    <div className="w-full mt-6 px-6 py-4 overflow-hidden">
                        {children}
                    </div>
                </div>
            </div>
            <div className="hidden bg-muted lg:block">
                {/* <img
                    src="https://i.pinimg.com/736x/89/09/0c/89090c511ce39668f979e9b1b83964ef.jpg"
                    alt="Image"
                    width="650"
                    height="190"
                    className="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
                /> */}

                
            </div>
          
        </div>
    );
}
